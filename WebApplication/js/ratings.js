function ratings(rateButtonID,rateBlockId) {
    
    document.getElementById(rateButtonID).onclick = function(){    
        document.getElementById(rateBlockId).style.display = 'block';
    }

}

