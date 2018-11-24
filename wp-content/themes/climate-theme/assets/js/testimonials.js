let $url = document.location.href;

if( $url.match('testimonials')) {
    // define our colors
    const colors = ["#52A55D","#047713","#F5A623", "#D5D317"]

    // get all of our images within a specified container element
    let $testimonials = document.querySelectorAll('.testimonial')

    for (let i=0; i < $testimonials.length; i++) {
        // get a random color from list
        let random_color = Math.floor(Math.random()*colors.length)

        //get testimonial category
        let $category = $testimonials[i].querySelector('.testimonial-category')

        // apply random color to current image
        $testimonials[i].style.borderColor = colors[random_color]
        $category.style.color = colors[random_color]
    }
}