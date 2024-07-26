function handleResponse(inputId, responseObj) {

    if(responseObj.isValid) {
        $(`#${inputId}`).removeClass('is-invalid');
        return true;
    } 

    $(`#${inputId}`).addClass('is-invalid');
    $(`#${inputId}-feedback`).html(responseObj.responseText);
    return false;
}

async function validateInputAjax(requestObj) {
    let result;

    let actionURL = './php/api/validation.php';
    try {
        result = await $.ajax({
            type: "POST",
            url: actionURL,
            data: requestObj,
            dataType: "json",
          });

          return result;
    } catch (error) {
        console.log("Error");
        console.log(error);
    }
}

async function validateInputAsync(inputId,inputValue) {


    let isValid;

    if(inputId == 'pwd_confirm') {

        let valid = (inputValue == $("#pwd").val() && inputValue.length > 0);
        isValid = handleResponse(inputId, {'isValid': valid, 'responseText': 'Passwords don\'t match'});
        
    } else if(inputValue == 'Submit'){
        isValid = true;
    } else {
        let requestObj = {
            'validatefor' : inputId,
            'value' : inputValue,
        };
    
        let responseObj = await validateInputAjax(requestObj);
    
        isValid = handleResponse(inputId, responseObj);
       
    }

    validationObject[inputId] = isValid;
    return isValid;
}

function confirmAllValidationsDone(formElements){
    let validationArray = Object.values(validationObject);

    if(validationArray.length < formElements.length)
        return false;

    return true;

}

async function finishUncheckedValidations(formElements){

    let promiseArray = []
    for(element of formElements) {
        if(!(element.id in validationObject))
            promiseArray.push(validateInputAsync(element.id, element.value));
    }

    let results = await Promise.all(promiseArray);

    return results;
}

async function trySubmit() {

    let validationArray = Object.values(validationObject);

    if(!validationArray.includes(false)){
        $('#myModal').modal('show');
    }
}

$("#signupform").change(function (e) { 
    e.preventDefault();
    validateInputAsync(e.target.id, e.target.value);
});

$("#signupform").submit(function (e) { 
    e.preventDefault();
    let formElements = Array.from(this.elements);
    formElements.pop();
    
    if(confirmAllValidationsDone(formElements)){
        trySubmit();
    } else {
       let allValidationsPromise = finishUncheckedValidations(formElements)
       allValidationsPromise.then(function(response) {
            trySubmit();
       });
    }
});

let validationObject = {};