<div data-name="task-modal" class="modal">
    <div class="modal__content">
        <form class="task-form" name="add-task">
            <ul class="task-form__info">
                <li class="task-form__field">
                    <svg class="task-form__field_icon" viewBox="0 0 36 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 40V4.44444C0 3.22222 0.435185 2.17593 1.30556 1.30556C2.17593 0.435185 3.22222 0 4.44444 0H17.7778V4.44444H4.44444V33.2222L15.5556 28.4444L26.6667 33.2222V17.7778H31.1111V40L15.5556 33.3333L0 40ZM26.6667 13.3333V8.88889H22.2222V4.44444H26.6667V0H31.1111V4.44444H35.5556V8.88889H31.1111V13.3333H26.6667Z" />
                    </svg>
                    <input name="title" type="text" class="task-form__field_input" placeholder="Name of task">
                </li>
                <li class="task-form__field">
                    <svg class="task-form__field_icon" viewBox="0 0 36 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 40V4.44444C0 3.22222 0.435185 2.17593 1.30556 1.30556C2.17593 0.435185 3.22222 0 4.44444 0H17.7778V4.44444H4.44444V33.2222L15.5556 28.4444L26.6667 33.2222V17.7778H31.1111V40L15.5556 33.3333L0 40ZM26.6667 13.3333V8.88889H22.2222V4.44444H26.6667V0H31.1111V4.44444H35.5556V8.88889H31.1111V13.3333H26.6667Z" />
                    </svg>
                    <input name="deadline" onfocus="(this.type='date')" onblur="(this.type='text')" type="text" class="task-form__field_input" placeholder="Deadline">
                </li>
                <?php @include __DIR__.'/../../select-category/select-category.php' ?>
            </ul>
            <div class="task-form__actions">
                <button type="button" class="task-form__actions_close form-action-btn">Close</button>
                <button type="submit" class="task-form__actions_confirm form-action-btn">Confirm</button>
            </div>
        </form>
    </div>
</div>