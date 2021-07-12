function dataEquals()
{
    var maganszemely = document.getElementsByClassName('maganszemely');
    var szallitas = document.getElementsByClassName('szallitasreq');
    var company = document.getElementsByClassName('companyreq');
    var person = document.getElementsByClassName('personreq');

        if(document.getElementById('megegyeznek').checked == true)
        {
            for (let i = 0; i < szallitas.length; i++) {
                szallitas[i].removeAttribute('required');
                szallitas[i].value = "";
                
            }
            for (let i = 0; i < maganszemely.length; i++) {
                maganszemely[i].style.display = 'none';
            }
            for (let i = 0; i < person.length; i++) {
                person[i].removeAttribute('required');
                person[i].value = "";
            }
            for (let i = 0; i < company.length; i++) {
                company[i].removeAttribute('required');
                company[i].value = "";
            }
        }
        else
        {
            for (let i = 0; i < szallitas.length; i++) {
                szallitas[i].setAttribute('required', true);
                
            }
            for (let i = 0; i < maganszemely.length; i++) {
                maganszemely[i].style.display = '';
                
            }
            for (let i = 0; i < person.length; i++) {
                person[i].setAttribute('required', true);
                
            }
            document.getElementById('individual').checked = true;
            document.getElementById('person').style.display = "";
            document.getElementById('company').style.display = "none";
        }
}

function isIndividual()
{
        var company = document.getElementsByClassName('companyreq');
        var person = document.getElementsByClassName('personreq');

        if(document.getElementById('individual').checked == true)
        {
            document.getElementById('person').style.display = "";
            document.getElementById('company').style.display = "none";
            for (let i = 0; i < company.length; i++) {
                company[i].removeAttribute('required');
                company[i].value = "";
                
            }
            for (let i = 0; i < person.length; i++) {
                person[i].setAttribute('required', true);
                
            }
        }
        else
        {
            document.getElementById('person').style.display = "none";
            document.getElementById('company').style.display = "";
            for (let i = 0; i < company.length; i++) {
                company[i].setAttribute('required', true);
                
            }
            for (let i = 0; i < person.length; i++) {
                person[i].removeAttribute('required');
                person[i].value = "";
                
            }
        }
}