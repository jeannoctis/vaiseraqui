(function(classTitle) {
    const groupTitles = classTitle;
    groupTitles.forEach(group => {
        const faqTitles = document.querySelectorAll(group);
        faqTitles.forEach(title => {        
            title.addEventListener('click', function() {
                this.classList.toggle('active');
                this.parentElement.classList.toggle("active");

                const arrowBottom = this.querySelector('img.drop');
    
                if (arrowBottom.classList.contains('up')) {
                    arrowBottom.src = PATHSITE + "assets/images/icon-down.svg"
                    arrowBottom.classList.remove('up');
                } else {
                    arrowBottom.src = PATHSITE + "assets/images/icon-up.svg";
                    arrowBottom.classList.add('up');
                }
    
                const answer = this.nextElementSibling;
        
                if (answer.classList.contains("show")) {
                    answer.classList.remove("show");
                    answer.style.maxHeight = null;
                } else {
                    answer.classList.add("show");
                    answer.style.maxHeight = answer.scrollHeight + "px";
                }
            })
        })
    })
})(['.faq-item .title', '.faq-content .item .title'])