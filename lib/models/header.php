<?php

namespace SandersForPresident\Wordpress\Models;

use SandersForPresident\Wordpress\Services\News\RemoteNewsFeedService;

class HeaderModel extends BaseModel {
  const DEFAULT_LOGO = '/assets/images/logo.png';
  private $logo;
  private $notification;
  private $newsFeedService;
  private $newsItem;

  public function __construct() {
    $this->logo = get_field('logo', 'options');
    $this->displayLatestCampaignNews = get_field('notification_latest_campaign_news', 'options');
    $this->notification = get_field('notification_banner', 'options');
    $this->notificationTitle = get_field('notification_banner_title', 'options');

    if ($this->displayLatestCampaignNews) {
      $this->newsFeedService = new RemoteNewsFeedService();
      $this->loadLatestCampaignNews();
    }
  }

  public function getLogo() {
    if ($this->logo) {
      return $this->logo['sizes']['thumbnail'];
    } else {
      return get_template_directory_uri() . self::DEFAULT_LOGO;
    }
  }

  public function isDisplayLatestCampaignNews() {
    return $this->displayLatestCampaignNews;
  }

  public function hasNotification() {
    if ($this->displayLatestCampaignNews) {
      return !empty($this->newsItem);
    } else {
      return !empty($this->notification);
    }
  }

  public function getNotificationHeadline() {
    if ($this->displayLatestCampaignNews) {
      return $this->newsItem->getTitle();
    } else {
      return apply_filters('the_title', $this->notification->post_title);
    }
  }

  public function getNotificationLink() {
    if ($this->displayLatestCampaignNews) {
      return $this->newsItem->getLink();
    } else {
      return get_permalink($this->notification->ID);
    }
  }

  public function hasNotificationTitle() {
    if ($this->displayLatestCampaignNews) {
      return !empty($this->newsItem->getTitle());
    } else {
      return !empty($this->notificationTitle);
    }
  }

  public function getNotificationTitle() {
    return apply_filters('the_title', $this->notificationTitle);
  }

  private function loadLatestCampaignNews() {
    $news = $this->newsFeedService->getFeed();
    if (!empty($news)) {
      $this->newsItem = $news[0];
    }
  }
}
