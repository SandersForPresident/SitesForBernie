<?php

namespace SandersForPresident\Wordpress\Models;

class HeaderModel extends BaseModel {
  const DEFAULT_LOGO = '/assets/images/logo.png';
  public $logo;
  public $notification;

  public function __construct() {
    $this->logo = get_field('logo', 'options');
    $this->notification = get_field('notification_banner', 'options');
    $this->notificationTitle = get_field('notification_banner_title', 'options');
  }

  public function getLogo() {
    if ($this->logo) {
      return $this->logo['sizes']['thumbnail'];
    } else {
      return get_template_directory_uri() . self::DEFAULT_LOGO;
    }
  }

  public function hasNotification() {
    return !empty($this->notification);
  }

  public function getNotificationHeadline() {
    return apply_filters('the_title', $this->notification->post_title);
  }

  public function getNotificationLink() {
    return get_permalink($this->notification->ID);
  }

  public function hasNotificationTitle() {
    return !empty($this->notificationTitle);
  }

  public function getNotificationTitle() {
    return apply_filters('the_title', $this->notificationTitle);
  }
}
