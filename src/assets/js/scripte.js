document.querySelectorAll('.containerCard').forEach(card =>{
    card.querySelector('.commit').addEventListener('click',()=>{
        card.querySelector('.listeCommit').classList.toggle('hidden');
    });
});
document.querySelectorAll('.contianerbtn').forEach(text =>{
    text.querySelector('.toggle-btn').addEventListener('click',()=>{
    text.querySelector('.toggle-btn').classList.toggle('hidden'); 
    text.querySelector('.hide-btn').classList.toggle('hidden'); 
    text.querySelector('.btn').classList.toggle('hidden'); 
    });
    text.querySelector('.hide-btn').addEventListener('click',()=>{
        text.querySelector('.toggle-btn').classList.toggle('hidden'); 
        text.querySelector('.hide-btn').classList.toggle('hidden'); 
        text.querySelector('.btn').classList.toggle('hidden'); 
        });
});

// console.log('HHhe');

// const  hide  = document.getElementById('hide-btn');
// const RedBtn = document.getElementById('toggle-btn');
// const textRed = document.getElementById('more-text');
// function  red_hideMore(){
//     hide.classList.toggle('hidden'); 
//     RedBtn.classList.toggle('hidden');
//     textRed.classList.toggle('hidden'); 
// }
// function addCommit(){
     
//     document.getElementById('writercommit').classList.toggle('hidden'); 
//     document.getElementById('addcommit').classList.toggle('hidden'); 
    
// }
// function  replyCommit(){
     
//     document.getElementById('replyrcommit').classList.toggle('hidden');
//     document.getElementById('replyLike').classList.toggle('hidden');
// }

console.log("connect");
