const likebutton = document.querySelector('#likeButton')
let clicked = true;

likebutton.addEventListener('click', () => {
    clicked ? (likebutton.setAttribute('stroke', '#f01'), clicked = false)
        : (likebutton.setAttribute('stroke', '#6C757D'), clicked = true);
})
