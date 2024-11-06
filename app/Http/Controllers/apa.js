const dino = document.querySelector('.dino')
const kactus = document.querySelector('.kaktus')
const button = document.querySelector('.button')

button.addEventListener('click', function() {
    kaktus.style.animationPlayState = 'running'
    button.style.display = 'none'
})

window.addEventListener('click', function() {
    dino.style.bottom = '150px'
    setTimeout(() => {
        dino.style.bottom = '-5px'
    }, 600);
})

setInterval(() => {
    const dinoBound = dino.getBoundingClientRect()
    const kaktusBound = kaktus.getBoundingClientRect()
    const leftJump = dinoBound.right - 10 >= kaktusBound.left
    const rightJump = dinoBound.left + 20 <= kaktusBound.right
    condt topJump = dinoBound


