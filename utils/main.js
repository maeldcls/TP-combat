let next = document.querySelector('.next');
let menu = document.querySelector('.menu');
let tour = document.querySelector('.tour');
let pdv = document.querySelector('.pvHero');
let win = document.querySelector('#win')
let monstHp = document.querySelector('.pvMonster')
let hero = document.querySelector('.hero');
let monster = document.querySelector('.monster');
let hit = document.querySelector('#hit');
let index=1;



next.addEventListener("click", function() {
    if(index<foo.length-1){  
        if(index%2 != 0){
            hero.classList.remove('attackHero');
            monster.classList.add('attackMonster');
            hit.play();
            
            let pvHero = foo[index].split('!');
            if(pvHero !=''){
                pdv.innerHTML = pvHero[1];
            }
            tour.innerHTML = pvHero[0];

            if(pdv.textContent == 0){
                tour.innerHTML = "YOU LOOSE";
                next.style.display = "none";
            }

        }else{
            monster.classList.remove('attackMonster');
            hero.classList.add('attackHero');
            hit.play();
            let pvsplit = foo[index].split('inflige ');
            let pvMonster = pvsplit[1].split(' dégats');
            tour.innerHTML = foo[index];
            let int = parseInt(monstHp.textContent);
            let int2 = parseInt(pvMonster);
            if(int-int2>0){
                monstHp.innerHTML = int-int2;
            }else{
                monstHp.innerHTML = 0;
                tour.innerHTML = "YOU WIN";
                next.style.display = "none";
            }
        }
        index++;
    } 

    if(index == foo.length){
        document.getElementById('my_audio').pause();
        win.play();
    }
    
});



window.onload = function() {
    my_audio.play();
}




  