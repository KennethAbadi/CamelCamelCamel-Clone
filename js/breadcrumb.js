function updateBreadcrumb () {
    const pathArray = JSON.parse(sessionStorage.getItem('breadcrumbPaths')) || [];

    const currentPage = {
        title: document.title,
        url: window.location.pathname
    };

    if (pathArray.length === 0 || pathArray[pathArray.length - 1].url !== currentPage.url) {
        pathArray.push(currentPage);
    }

    if (pathArray.length > 5) {
        pathArray.shift();
    }

    let previousIndex = pathArray.findIndex((page, index) => index < pathArray.length - 1 && page.url.trim() === currentPage.url.trim());

    if (previousIndex !== -1) {
        pathArray.splice(previousIndex, 1);
    }

    sessionStorage.setItem('breadcrumbPaths', JSON.stringify(pathArray));
    displayBreadcrumbs();
};

function displayBreadcrumbs () {
    const pathArray = JSON.parse(sessionStorage.getItem('breadcrumbPaths')) || [];
    const breadcrumbContainer = document.getElementById('breadcrumbs');
    breadcrumbContainer.innerHTML = '';

    pathArray.forEach((page, index) => {
        const breadcrumbItem = document.createElement('a');
        breadcrumbItem.href = page.url;
        breadcrumbItem.textContent = page.title;
        breadcrumbContainer.appendChild(breadcrumbItem);

        if (index < pathArray.length - 1) {
            breadcrumbContainer.appendChild(document.createTextNode('>'));
        }
    });
}