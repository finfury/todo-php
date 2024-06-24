<div data-name="category-modal" class="modal">
    <form name="add-category" class="modal__content add-category">
        <h3 class="add-category__title">Add a new category</h3>
        <div class="add-category__field">
            <input name="title" type="text" class="add-category__field_input" placeholder="Name of category">
        </div>
        <div class="add-category__field">
            <label for="color" class="add-category__field_label">Please, choose the color</label>
            <input name="color" type="color" value="#eda13e" class="category-color_input">
        </div>
        <div class="task-form__actions">
            <button type="button" class="task-form__actions_close form-action-btn">Close</button>
            <button type="submit" class="task-form__actions_confirm form-action-btn">Confirm</button>
        </div>
    </form>
</div>