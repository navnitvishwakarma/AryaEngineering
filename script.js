// Mobile Menu Toggle
document.querySelector('.mobile-menu').addEventListener('click', function() {
    const nav = document.querySelector('nav ul');
    nav.style.display = nav.style.display === 'flex' ? 'none' : 'flex';
});

// Smooth Scrolling for Anchor Links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Form Submission Handler
const forms = document.querySelectorAll('form');
forms.forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Thank you for your message! We will contact you soon.');
        form.reset();
    });
});

// Contact Form Submission
document.getElementById('inquiryForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Get form values
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const subject = document.getElementById('subject').value;
    
    // Simple validation
    if (!name || !email || !subject) {
        alert('Please fill in all required fields');
        return;
    }
    
    // In a real implementation, you would send this data to your server
    // For demo purposes, we'll just show a success message
    alert(`Thank you, ${name}! Your inquiry about ${subject} has been received. We'll contact you at ${email} shortly.`);
    
    // Reset form
    this.reset();
});