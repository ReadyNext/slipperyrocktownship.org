<?php

class Alert_WP_Widget extends WP_Widget {

    function __construct() {
        parent::__construct('readynext_alert', __('Alert'));
    }

    function widget($args, $instance) {
        if (!isset($instance['type'])) {
            $instance['type'] = 'info';
        }

        if (!isset($instance['title'])) {
            $instance['title'] = '';
        }

        if (!isset($instance['content'])) {
            $instance['content'] = '';
        }
        
        ?>
            <div class="alert alert-<?= $instance['type']; ?> mb-2" role="alert">
                <h4 class="alert-heading"><?= $instance['title']; ?></h4>
                <p><?= $instance['content']; ?></p>
            </div>
        <?php
    }

    function update($new_instance, $old_instance) {
        return $new_instance;
    }

    function form($instance) {
        if (!isset($instance['type'])) {
            $instance['type'] = 'info';
        }

        if (!isset($instance['title'])) {
            $instance['title'] = '';
        }

        if (!isset($instance['content'])) {
            $instance['content'] = '';
        }

        $t = $instance['type'];

        ?>
            <p>
                <label for="<?= $this->get_field_id('type'); ?>"><?= __('Type:'); ?></label>
                <select class="type widefat" id="<?= $this->get_field_id('type'); ?>" name="<?= $this->get_field_name('type'); ?>">
                    <option value="info" <?= ($t == 'info') ? 'selected' : '' ?>>Information</option>
                    <option value="success" <?= ($t == 'success') ? 'selected' : '' ?>>Success</option>
                    <option value="warning" <?= ($t == 'warning') ? 'selected' : '' ?>>Warning</option>
                    <option value="danger" <?= ($t == 'danger') ? 'selected' : '' ?>>Urgent</option>
                </select>
            </p>
            <p>
                <label for="<?= $this->get_field_id('title'); ?>"><?= __('Title:'); ?></label> 
                <input class="title widefat" id="<?= $this->get_field_id('title'); ?>" name="<?= $this->get_field_name('title'); ?>" type="text" value="<?= esc_attr($instance['title']); ?>" />
            </p>
            <p>
                <label for="<?= $this->get_field_id('content'); ?>"><?= __('Content:'); ?></label> 
                <textarea class="code content widefat" id="<?= $this->get_field_id('content'); ?>" name="<?= $this->get_field_name('content'); ?>"><?= $instance['content']; ?></textarea>
            </p>
        <?php 
    }

}
