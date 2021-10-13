///////////////// FUNCTIONS HELPER/////////////////
////apikey
import {
    apiTempo,
    api_airvisual,
} from "./apikey.js";

///////////////// function hot //////////
export function hotTag(baseurl, likes) {
    return likes > 1 ? `<img src='${baseurl}/template/images/hot.gif'>` : ""

}
////// function size texte ////
export function sizeTag(size, postlike) {
    if (postlike == 0) {
        return size = 14
    } else if (postlike >= 10) {
        return size = 60

    } else {
        return size = size + postlike * 5
    }

}

/////// function novidade //////////////
export function novidade(baseurl, post_date) {
    var countDownDate = new Date(post_date).getTime()
    var now = new Date().getTime();
    var distance = now - countDownDate
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));

    return days <= 5 ? `<img src='${baseurl}/template/images/novo.gif'>` : ""
}

////// Truncate string adress 

export function truncateString(str, num) {
    // If the length of str is less than or equal to num
    // just return str--don't truncate it.
    if (str.length <= num) {
        return str
    }
    // Return str truncated with '...' concatenated to the end of str.
    return str.slice(0, num) + '...'
}

//////// BAD LIST display bad tag in info//

export function badlist(postid) {
    let badlist = document.getElementById('dis-' + postid)
    if (badlist) {
        badlist.innerHTML = 'bad!!'
    }

}

//////// DISPLAY NAME CITY ////////////////////
export function villeName(gcs, lat, lng) {
    gcs.reverse().latlng([lat, lng]).run((err, res, rep) => {
        if (err) {
            return;
        }
        search.value = rep.address.City

    })
    search.addEventListener('focus', () => {
        search.value = ''
    })

}


////DETECT MOBILE DEVICES
export function detectDevise() {
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? true : false
}

//////// MUNICIPIOS 
export async function municipios(lat, lng) {
    const muniplist = document.getElementById('municipios')
    muniplist.innerHTML = ''
    const munipcontent = document.createElement('div')
    munipcontent.classList.add("munip")
    const response = await fetch(`https://geoptapi.org/gps?lat=${lat}&lon=${lng}&detalhes=1`);
    if (response.status == 200) {
        const munip = await response.json()
        munipcontent.innerHTML =
            `<p> <strong> Municipio:</strong> ${munip.detalhesMunicipio.nome}  </p>
                 <p> <strong>Distrito: </strong> ${munip.distrito}  <strong> Habitantes: </strong> ${(munip.detalhesMunicipio.populacao)}  <strong>  Area: </strong> ${(munip.detalhesMunicipio.areaha)} Km2 <strong>Codigo Postal : </strong> ${munip.detalhesMunicipio.codigopostal} <strong> Eleitores : </strong> ${(munip.detalhesMunicipio.eleitores)}<p>
                <p><strong> Presidente de camara:</strong> ${munip.detalhesMunicipio.presidentecamara}</p>
                <p> <strong> Freguesias:</strong> ${munip.freguesia} </p>`
        fetchReceitas('https://dados.gov.pt/s/resources/receitas-municipais-2016/20180514-160512/AIIRM2016.json', munip.detalhesMunicipio.nome)
    } else {
        munipcontent.innerHTML = '<p>Sem informações</p>'
        fetchReceitas(null, null)
    }
    muniplist.appendChild(munipcontent)

}


/////// MUNICIPIOS RECEITAS

export async function fetchReceitas(url, municipio) {
    const receitas = document.getElementById('receitas')
    receitas.innerHTML = ''
    if (url != null || municipio != null) {
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric' };
        const response = await fetch(url);
        const json = await response.json();
        var result = json.d.filter(function (obj, index) {
            return obj.dscautarquia === municipio
        })

        result.map((item, index) => {
            const receitaslist = document.createElement('div')
            receitaslist.classList.add("munip")
            const data = new Date(item.Timestamp).toLocaleDateString('pt-PT', options);

            receitaslist.innerHTML = `<h2> <img src="https://twemoji.maxcdn.com/v/13.0.0/72x72/1f4b0.png" height="30px" width="30px"><strong>
         Receitas do municipio</strong></h2> <p> <em> Atualização ${data}</em></p>

        <ul> <li>Imi : <strong> ${(item.imi / 1000000).toFixed(2)} </strong>milhões € </li>
        <li>Inpostos municipais: <strong>${(item.impostosmunicipais / 1000000).toFixed(2)}</strong> milhões € </li>
        <li>Imt: <strong> ${(item.imt / 1000000).toFixed(2)}</strong> milhões € </li>
       <li> Iuc: <strong> ${(item.iuc / 1000000).toFixed(2)} </strong> milhões € </li>
        <li> Outras receitas: <strong>  ${(item.outrasreceitas / 1000000).toFixed(2)}</strong> milhões €</li>
        <li> Taxas multas e outros impostos: <strong>  ${(item.taxasmultasoutrosimpostos / 1000000).toFixed(2)}</strong> milhões €</li>
       <li>  Transferência orçamento do estado: <strong>  ${(item.transferenciasorcamentoestado / 1000000).toFixed(2)} </strong> Milhões €</li>
       <li>Vendas e serviços: <strong>  ${(item.vendabensservicos / 1000000).toFixed(2)}</strong>  milhões €</li>
       </ul>

         <p>Finaciamento Europeu :<strong> ${(item.financiamentouniaoeuropeia / 1000000).toFixed(2)} milhões € </strong></p>
         <p> <strong> Totais :  <span class="numeros">${(item.receitastotais / 1000000).toFixed(2)} </span> milhões € </strong> </p>
         <p> <em>Fonte portal dos dados abertos </em></p>`
            receitas.appendChild(receitaslist)
        })

    }



}

/////////////////// POLUTION OPEN WHATHER
export async function airPolution(lat, lng) {
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    try {
        const url =
            `https://api.openweathermap.org/data/2.5/air_pollution?lat=${lat}&lon=${lng}&appid=${apiTempo}`

        const response = await fetch(url, requestOptions);

        const json = await response.json();
        let ca = json.list[0].main.aqi
        console.log(json)
        let rp
        if (ca <= 2) {
            rp = `<span class=" ar good"> Bom!</span> `
        }
        if (ca > 2 && ca < 4) {
            rp = `<span class=" ar nogood"> moderado!</span> `
        }
        if (ca >= 4) {
            rp = `<span class=" ar mau"> mau!</span> `
        }


        ar.innerHTML = `<p class="arp"> Qualidade do ar: ${rp}</p>`



    } catch (error) {
        console.log(error)

    }

}



//////////////////////METEO OPEM WATHER api.openweathermap.org /////
export async function meteoOpenWhather(lat, lng) {
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };
    try {
        const url =
            `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lng}&lang=pt&units=metric&appid=${apiTempo}`

        const response = await fetch(url, requestOptions);

        const json = await response.json();
        console.log(json)
        tempo.innerHTML =
            `<p class="arp"> Temperatura: ${Math.round(json.main.temp)}º  <img src="https://openweathermap.org/img/wn/${json.weather[0].icon}.png" width="35px" height="35px"> ${json.weather[0].description}</p>`
    } catch (error) {
        console.log(error)

    }
}


///////////// AIR QUALITY api.airvisual.com

export async function airQuality(lat, lng) {
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    try {
        const url =
            `https://api.airvisual.com/v2/nearest_city?lat=${lat}&lon=${lng}&key=${api_airvisual}`

        const response = await fetch(url, requestOptions);

        const json = await response.json();
        console.log(json.data.current.pollution.aqius)
        let c = json.data.current.pollution.aqius
        let rp
        if (c <= 50) {
            rp = `<span class=" ar good"> Bom!</span> `
        }
        if (c > 50 && c <= 80) {
            rp = `<span class=" ar nogood"> medio!</span> `
        }
        if (c > 80) {
            rp = `<span class=" ar mau"> mau!</span> `
        }
       
        ar.innerHTML = `<p class="arp"> Qualidade do ar: ${rp}</p>`

    } catch (error) {
        console.log(error)

    }
}



