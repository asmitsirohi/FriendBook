function changeCaptcha() {
    let captchaImg = document.getElementById("captchaImg");
    url = 'captcha.php';
    
    fetch(url).then((response) => {
        return response.clone();
    }).then((data) => {
        console.log(data.url);
        captchaImg.src = data.url;
    })
}