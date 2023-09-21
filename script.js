// получаем кнопку по которой будет проходить смена тем
const btn = document.querySelector('.favorite');
console.log(btn);


//функция начального состояния
function initialState(themeName){
    //записываем в localStorage переданую тему
    localStorage.setItem('theme', themeName);
    //меняем класс темы
    document.documentElement.className = themeName;
}


// initialState(dark-theme)



//меняет состояние туда-обратно
function toggleTheme(){
    //проверяем что в localStorage, если темная тема, устанавливаем светлую и тд
    if(localStorage.getItem('theme') == 'dark-theme'){
        initialState('light-theme');
    }else{
        initialState('dark-theme');
    }
}


btn.addEventListener('click', (e) => {
    e.preventDefault();
    toggleTheme();
})