
<?php
global $post;
$start_date = get_event_start_date();
$start_time = get_event_start_time();
$end_date   = get_event_end_date();
$end_time   = get_event_end_time();
$event_type = get_event_type();
if (is_array($event_type) && isset($event_type[0]))
    $event_type = $event_type[0]->slug;

$thumbnail = get_event_thumbnail($post, 'full');
$external_url = get_field('external_url', $post->ID); // Get the custom field for the external URL
?>
<div class="wpem-event-box-col wpem-col wpem-col-12 wpem-col-md-6 wpem-col-lg-<?php echo esc_attr(apply_filters('event_manager_event_wpem_column', '4')); ?>">
    <div class="wpem-event-layout-wrapper">
        <div <?php event_listing_class(''); ?>>
            <a href="<?php echo esc_url($external_url ? $external_url : get_permalink($post)); ?>" class="wpem-event-action-url event-style-color <?php echo esc_attr($event_type); ?>" target="_blank" rel="noopener">
                <div class="wpem-event-banner">
                    <div class="wpem-event-banner-img" style="background-image: url(<?php echo esc_attr($thumbnail) ?>)">
                        <?php do_action('event_already_registered_title'); ?>
                        <div class="wpem-event-date">
                            <div class="wpem-event-date-type">
                                <?php if (!empty($start_date)) { ?>
                                    <div class="wpem-from-date">
                                        <div class="wpem-date"><?php echo date_i18n('d', strtotime($start_date)); ?></div>
                                        <div class="wpem-month"><?php echo date_i18n('M', strtotime($start_date)); ?></div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wpem-event-infomation">
                    <div class="wpem-event-date">
                        <div class="wpem-event-date-type">
                            <?php if (!empty($start_date)) { ?>
                                <div class="wpem-from-date">
                                    <div class="wpem-date"><?php echo date_i18n('d', strtotime($start_date)); ?></div>
                                    <div class="wpem-month"><?php echo date_i18n('M', strtotime($start_date)); ?></div>
                                </div>
                            <?php }

                            if ($start_date != $end_date && !empty($end_date)) { ?>
                                <div class="wpem-to-date">
                                    <div class="wpem-date-separator">-</div>
                                    <div class="wpem-date"><?php echo date_i18n('d', strtotime($end_date)); ?></div>
                                    <div class="wpem-month"><?php echo date_i18n('M', strtotime($end_date)); ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="wpem-event-details">
                        <?php do_action('wpem_event_listing_event_detail_start', $post->ID); ?>
                        <div class="wpem-event-title">
                            <h3 class="wpem-heading-text"><?php echo esc_html(get_the_title()); ?></h3>
                        </div>

                        <div class="wpem-event-date-time">
                            <span class="wpem-event-date-time-text">
                                <?php display_event_start_date(); ?>
                                <?php if (!empty($start_time)) display_date_time_separator(); ?>
                                <?php display_event_start_time(); ?>
                                <?php if (!empty($end_date) || !empty($end_time)) { ?> - <?php } ?>
                                <?php if (isset($start_date) && isset($end_date) && $start_date != $end_date) display_event_end_date(); ?>
                                <?php if (!empty($end_date) && !empty($end_time)) display_date_time_separator(); ?>
                                <?php display_event_end_time(); ?>
                            </span>
                        </div>
                        <div class="wpem-event-location">
                            <span class="wpem-event-location-text">
                                <?php
                                if (get_event_location() == 'Online Event' || get_event_location() == '') :
                                    echo esc_attr__('Online Event', 'wp-event-manager');
                                else :
                                    display_event_location(false);
                                endif; ?>
                            </span>
                        </div>
                        <?php if (get_option('event_manager_enable_event_types') && get_event_type()) { ?>
                            <div class="wpem-event-type"><?php display_event_type(); ?></div>
                        <?php }
                        do_action('event_already_registered_title'); ?>

                        <?php if (get_event_ticket_option()) { ?>
                            <div class="wpem-event-ticket-type <?php echo display_event_ticket_option(); ?>" class="wpem-event-ticket-type-text">
                                <span class="wpem-event-ticket-type-text"><?php display_event_ticket_option(); ?></span>
                            </div>
                        <?php } ?>
                        <?php do_action('wpem_event_listing_event_detail_end', $post->ID); ?>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
