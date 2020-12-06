let qntd = document.getElementById("qtd");
let valorUn = document.getElementById("prec");
let valorTotal = document.getElementById("precoTotal");
let desc = document.getElementById("desc");
let subT = document.getElementById("subT");
let ValorT = document.getElementById("total");
console.log(desc.innerHTML);

var TF = 0;

var descQ = Math.floor((Math.random() * 25) + 1);
desc.innerHTML = descQ


var pl = 1;
var prec = 60.00;
var vt = prec;

let vFrete = 0;


subT.innerHTML = vt - descQ;
ValorT.innerHTML = vt - descQ;

function frete(){
    if(vFrete == 0){
        var frt = Math.floor((Math.random() * 25) + 1);
        TF = frt;
        document.getElementById("frete").innerHTML = frt
    
        var total = (vt - descQ) + frt;
        ValorT.innerHTML = total;

        vFrete = 1;
    }


}

function diminuir(){
    pl = pl - 1;

    if(pl <= 0){
        pl = 0;
        qntd.value = pl; 
        subT.innerHTML = "0";
        ValorT.innerHTML = "0";
    }
    else{
        qntd.value = pl; 
        subT.innerHTML = vt - descQ;
        ValorT.innerHTML = vt - descQ;
    }
    vt = pl * prec;
    valorTotal.innerHTML = "R$: " + vt + ",00";

    if(TF != 0){
        ValorT.innerHTML = (vt - descQ) + TF;
    }
}

function aumentar(){
    pl = pl + 1;
    qntd.value = pl; 
    vt = pl * prec;
    valorTotal.innerHTML = "R$: " + vt + ",00";
    subT.innerHTML = vt - desc.innerHTML;
    ValorT.innerHTML = vt - descQ;

    if(TF != 0){
        ValorT.innerHTML = (vt - descQ) + TF;
    }
}

let c1 = 0;
let c2 = 0;


function mudarCor(){
    if(c1 == 0){
        document.getElementById("cor1").style.color = "#bf422c";
        c1 = 1;
    }
    else if (c1 == 1){
        document.getElementById("cor1").style.color = "rgb(29, 27, 27)";
        c1 = 0;
    }
}
function mudarCor1(){
    if(c2 == 0){
        document.getElementById("cor2").style.color = "#bf422c";
        c2 = 1;
    }
    else if (c2 == 1){
        document.getElementById("cor2").style.color = "rgb(29, 27, 27)";
        c2 = 0;
    }
}
