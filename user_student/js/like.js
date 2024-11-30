var form = document.querySelector('.form');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    likePost()

});

function likePost(postId) {
    
    var likeButton = document.getElementById('likeBtn' + postId);
    

    var likeImage = likeButton.querySelector('img');
    likeImage.src = '../assets/css/love-24.png';
    
}