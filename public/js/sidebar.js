$(function() {
   // document.getElementById('sidebar').removeAttribute('class');
   // document.getElementById('sidebar-open').setAttribute('hidden','true');
});

function openNav() {
    document.getElementById('sidebar').setAttribute('hidden','true');
    document.getElementById('sidebar-open').removeAttribute('hidden');
}

function closeNav() {
    document.getElementById('sidebar-open').setAttribute('hidden','true');
    document.getElementById('sidebar').removeAttribute('hidden');
}
