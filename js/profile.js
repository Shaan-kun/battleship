document.addEventListener('DOMContentLoaded', function() {
    let mx = 0;
    let my = 0;

    let settingButton = document.querySelector('.setting-button');
    let settingWindow = document.querySelector('.setting-window');

    settingButton.addEventListener('click', function() {
        if (settingWindow.classList.contains('hide')) {
            settingWindow.classList.remove('hide');
        }
    });
    settingWindow.addEventListener('click', function(e){
        if (e.target == settingWindow){
            settingWindow.classList.add('hide');
        }
    });
    settingWindow.querySelector('button[act=close]').addEventListener('click', function() {
        settingWindow.classList.add('hide');
    });

    let userInfo = document.querySelector('.user-info-window');
    
    document.body.addEventListener('click', async function(e){
        mx = e.clientX;
        my = e.clientY;
        if (!userInfo.classList.contains('hide')) {
            userInfo.classList.add('hide');
        }
        if (e.target.hasAttribute('open-user-info')){
            
            let userId = e.target.getAttribute('open-user-info');
            
            let r = await get_user_info(userId);
            let user = r.response;

            userInfo.style.left = mx + 'px';
            userInfo.style.top = my + 'px';

            userInfo.querySelector('img').setAttribute('src', '/images/avatars/' + user['avatar']);
            userInfo.querySelector('.nickname').innerHTML = user['login'];
            userInfo.querySelector('.user-description').innerHTML = user['description'];

            userInfo.querySelector('.reg-date').innerHTML = user['reg_date'];
            userInfo.querySelector('.count').innerHTML = user['game_count'];
            userInfo.querySelector('.wins').innerHTML = user['game_win'];
            userInfo.querySelector('.loses').innerHTML = user['game_loss'];
            userInfo.querySelector('.score').innerHTML = user['score'];

            userInfo.classList.remove('hide');
        } 
    });

});

async function get_user_info(id, ) {
	let xhr = new XMLHttpRequest();
	xhr.open('GET', "php/game/get_user_info.php?id=" + id);
	xhr.responseType = 'json';
	xhr.send();


    let res;
    let p = new Promise((r) => res = r);
    xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            res(xhr);
        }
    }
    return p;
}