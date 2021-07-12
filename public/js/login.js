function dataEquals()
{
    var maganszemely = document.getElementsByClassName('maganszemely');
        if(document.getElementById('megegyeznek').checked == true)
        {
            for (let i = 0; i < maganszemely.length; i++) {
                maganszemely[i].style.display = 'none';
                
            }
        }
        else
        {
            for (let i = 0; i < maganszemely.length; i++) {
                maganszemely[i].style.display = 'block';
                
            }
        }
}

function isIndividual()
{
        if(document.getElementById('individual').checked == true)
        {
            document.getElementById('person').style.display = "";
            document.getElementById('company').style.display = "none";
        }
        else
        {
            document.getElementById('person').style.display = "none";
            document.getElementById('company').style.display = "";
        }
}