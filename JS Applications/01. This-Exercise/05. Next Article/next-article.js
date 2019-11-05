function getArticleGenerator(articles) {
    let i = 0;
    let content = document.getElementById('content');
    return function () {
        if (articles.length - 1 >= i) {
            let article = document.createElement('article');
            article.textContent += articles[i];
            content.appendChild(article);
            i++
        }
    }
}
