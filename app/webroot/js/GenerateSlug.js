$(document).ready(function() {
    // Event listener on category input field
    $('#categoryName').on('input', function() {
        var categoryName = $(this).val().trim().toLowerCase();
        var slug = generateSlug(categoryName);
        $('#slug').val(slug);
    });
});

// Function to generate slug from category name
function generateSlug(categoryName) {
    return categoryName.replace(/\s+/g, '-')
                        .replace(/[^\w\-]/g, '')       
                        .replace(/\-\-+/g, '-');      
}
