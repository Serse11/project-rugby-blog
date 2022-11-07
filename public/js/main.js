let dialog; 

if(document.getElementById('dialogDelete') != null)  { 
    dialog = document.getElementById('dialogDelete'); 
    dialog.addEventListener('close', (e) => {
        fetchIdArticle(e);
    });
}

document.querySelectorAll(".js_article_btn_delete").forEach((element => {
    element.addEventListener("click", (e) => fetchIdArticle(e) )
}));

const fetchIdArticle = (e) => {
    let article_id = e.currentTarget.dataset.article_id;
    document.getElementById("js_article_id").value = article_id;
};
