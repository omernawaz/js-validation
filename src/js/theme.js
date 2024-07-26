let activeTheme = 'dark';

function getTheme(themeOption){
    
    const DARK_THEME = 'https://bootswatch.com/5/darkly/bootstrap.css';
    const LIGHT_THEME= 'https://bootswatch.com/5/flatly/bootstrap.css';

    if(themeOption == 'light') {
        return LIGHT_THEME;
    } else {
        return DARK_THEME;
    }
}

function applyTheme(themeOption = 'dark') {
    let themeURL = getTheme(themeOption);

    let newStyleSheet = document.createElement('link');
    newStyleSheet.type = 'text/css';
    newStyleSheet.rel = 'stylesheet';
    newStyleSheet.href = themeURL;

    let link = document.styleSheets;
    delete link[0];

    document.head.appendChild(newStyleSheet);
}

function toggleTheme() {
    if(activeTheme == 'dark') {
        activeTheme = 'light';
    } else {
        activeTheme = 'dark';
    }
}

function changeButton(button) {

    let htmlText = 'Switch To ';
    if(activeTheme == 'dark') {
        htmlText += 'Light';
        $(button).removeClass('btn-dark');
        $(button).addClass('btn-light');
    } else {
        htmlText += 'Dark';
        $(button).removeClass('btn-light');
        $(button).addClass('btn-dark');
    }
    $(button).html(htmlText);
}

applyTheme(activeTheme);

$("#themetoggle").click(function (e) { 
    e.preventDefault();
    console.log("clicked");
    toggleTheme();
    changeButton(this);
    applyTheme(activeTheme);
});