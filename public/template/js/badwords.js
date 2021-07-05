export const filterWords = ["caralho", "puta","cabrão","cabrao","preto","preta","cona","foda-se","foda","fuck","anal","anus","gangbang","gangbanged"];
// "i" is to ignore case and "g" for global
export var rgx = new RegExp('\\b(' + filterWords.join('|') + ')\\b', 'i' );
//export let rgx = new RegExp(filterWords.join("|"), "gi");

export function badWord(str) {   
    if(rgx.test(str)){
        return true
    }else{
        return false
    }

       
        
}