
 ///helpers 

 import {
    sizeTag,
    novidade,
    hotTag,
    truncateString
} from "./helpers.js";


export function getLocaisIntro(baseurl) {
    intro.innerHTML=''
    loading.style.display = 'block'
   loading.innerHTML = 'Loading...'

    var myHeaders = new Headers();

    myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

    var requestOptions = {
        method: 'GET',
        headers: myHeaders,
        // body: urlencoded,
    };

    fetch(`${baseurl}/locais`, requestOptions)
        .then(response => response.json())
        .then(posts => {
            loading.style.display = 'none'
        
            posts.data.map((post, indice) => {
                let def = post.emoji !=null  ? `<img src="${post.emoji}" width="40px" height="40px"> </img>`:  `<img src="https://twemoji.maxcdn.com/v/13.0.0/72x72/26aa.png" width="45px" height="45px"> </img>`
                let novo = novidade(baseurl,post.created_at)
                let hot = hotTag(baseurl,post.likes)
               let size = sizeTag(20, post.likes)
               let list =document.createElement('li')
               list.innerHTML =  `${def}<p class="prim">${post.title} ${hot}  </p><span class="adress"> ${truncateString(post.adress, 50)} <strong>likes:(${post.likes})</strong>  </span>`
               intro.appendChild(list)
              



            })
        })
}


