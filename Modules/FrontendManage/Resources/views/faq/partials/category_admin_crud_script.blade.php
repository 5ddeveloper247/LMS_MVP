<script>
    $(document).on('click', '.edit-faq-category', function() {
        let category = $(this).data('item');
        $('#faqCategoryId').val(category.id);
        $('#edit_categoryName').val(category.name);
        $('#edit_categorySlug').val(category.slug);
        $('#edit_categoryEyebrow').val(category.eyebrow);
        $('#edit_categorySectionTitle').val(category.section_title);
        $('#edit_faq_category').modal('show');
    });

    $(document).on('click', '.delete-faq-category', function() {
        $('#faqCategoryDeleteId').val($(this).data('id'));
        $('#delete_faq_category').modal('show');
    });
</script>
