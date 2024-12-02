if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
    const dataTable = new simpleDatatables.DataTable("#search-table", {
        searchable: true,
        perPageSelect: false,
        classes:{
            search: "datatable-search",
            bottom: "datatable-bottom p-4",
            top: "m-4 items-start bg-gray-100",

        }
    });
}


