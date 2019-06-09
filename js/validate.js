function validateArtNr()
{
    if($("#artNr").val().length < 9)
    {
        alert("Artikelnummer muss min 9 Zeichen beinhalten!");
    }
}

function validateArtBer()
{
    if($("#artBez").val().length == 0)
    {
        alert("Artikelbezeichnung leer");
    }
}

function validateVk()
{
    var vk = $('#vk').val();
    var ek = $('#ek').val();

    if(vk < (ek * 1.30))
    {
        alert("VK muss 30% größer als der EK sein!")
    }

}

function validateEk()
{
    if($("#ek").val() < 0)
    {
        alert("EK muss größer 0 sein!");
    }
}

function validateLagerBest()
{
    if(!($("#lagerbest").val() >= 0))
    {
        alert("Lagerbestand größer 0 oder gleich 0");
    }
}

function validateBestands()
{
    if(!($("#bestandsV").val() > 0 || $("#artNr").val() < 0))
    {
        alert("Lagerbestand darf nicht 0 sein!");
    }
}

function validate()
{
    if(validateArtNr() & validateArtBer() & validateEk() & validateLagerBest() & validateVk() & validateBestands());
    {
        alert("true");
    }

}

function deckungsbeitrag()
{
    alert(($("#vk").val() - $("#ek").val()) *
        $("#lagerbest").val);

}