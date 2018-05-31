function showMainPage() {
    showRecette('mainPage');
    listerTop();
    currentUser();
}

function showLoginPage() {
    showRecette('loginPage');
}
function showRegistrationPage() {
    showRecette('registrPage');
}
function showPanier() {
    showPanierContenu();
    showRecette('panierPage');
}
function showFilm(idf) {
    showFilmDescription(idf);
    showRecette('singlePage');
}
function showAdminLister() {
    listerFilmsAdmin();
    showRecette('adminPageLister');
}
function showAdminModifier(idf) {
    obtenirFiche(idf);
    showRecette('adminPageUpdate');
}
function showAdminAjouter() {
    showRecette('adminPageCreate');
}
function showCatalogWithFiltre(nom, genre, pays) {
    showRecette('catalogPage');
    montreCatalogueByRequet(nom, genre, pays);
}