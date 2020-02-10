$(function() {

  function getPageId() {
    let pathPage = window.location.pathname;
    let pageId = 'notSet';
    if (pathPage.includes('public/pages/1')) {
      pageId = 0;
    }
    else if (pathPage.includes('public/pages/2') || pathPage.includes('public/projet')) {
      pageId = 1;
    }
    else if (pathPage.includes('public/pages/3') || pathPage.includes('public/post') || pathPage.includes('public/categorie')) {
      pageId = 2;
    }
    else if (pathPage.includes('public/pages/4')) {
      pageId = 3;
    }
    return pageId;
  }

  pageId = getPageId();
  if (pageId !== 'notSet') {
    $('.nav').children('li').eq(pageId).addClass('active');
  }
});
