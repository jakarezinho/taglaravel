///////////////// FUNCTIONS HELPER/////////////////

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
    console.log(postid)
    let badlist = document.getElementById('dis-' + postid)
    if (badlist) {
        badlist.innerHTML = 'bad!!'
    }

}

//////// DISPLAY NAME CITY ////////////////////
export function villeName(gcs,lat, lng) {
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

