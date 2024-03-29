<?php

/**
 * @file
 * Definition of Drupal\nivo_slider\Tests\NivoSliderTest.
 */

namespace Drupal\nivo_slider\Tests;

use Drupal\simpletest\WebTestBase;

class NivoSliderTest extends WebTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = array('libraries', 'nivo_slider');

  protected $privileged_user;

  public static function getInfo() {
    return array(
      'name' => 'Nivo Slider',
      'description' => 'Create slides, configure options and test slider generation.',
      'group' => 'Nivo Slider',
    );
  }

  function setUp() {
    parent::setUp();

    // Create users
    $this->privileged_user = $this->drupalCreateUser(array('administer nivo slider'));
  }

  /**
   * Test adding and removing slider images.
   */
  function testAddRemoveSlides() {
    // Login as the privileged user
    $this->drupalLogin($this->privileged_user);

    // Load the slider slides administration page
    $this->drupalGet('admin/structure/nivo-slider');
    $this->assertResponse(200, t('The privileged user can access the slider slides administration page.'));

    // Add five slides
    foreach (array(1, 2, 3, 4, 5) as $slide) {
      $edit = array();
      $edit['files[upload]'] = realpath('sites/all/modules/nivo_slider/images/' . $slide . '.jpg');
      $this->drupalPost('admin/structure/nivo-slider', $edit, t('Save configuration'));
      $this->assertText(t('The configuration options have been saved.'));
    }
  }

  /**
   * Test configuring slider slides.
   */
  function testConfigureSlides() {
    // Login as the privileged user
    $this->drupalLogin($this->privileged_user);

    // Load the slider slides administration page
    $this->drupalGet('admin/structure/nivo-slider');
    $this->assertResponse(200, t('The privileged user can access the slider slides administration page.'));

    // Add five new slides
    foreach (array(1, 2, 3, 4, 5) as $slide) {
      $edit = array();
      $edit['files[upload]'] = realpath('sites/all/modules/nivo_slider/images/' . $slide . '.jpg');
      $this->drupalPost('admin/structure/nivo-slider', $edit, t('Save configuration'));
      $this->assertText(t('The configuration options have been saved.'));
    }
  }

  /**
   * Test configuring slider options.
   */
  function testConfigureOptions() {
    // Login as the privileged user
    $this->drupalLogin($this->privileged_user);

    // Load the slider options administration page
    $this->drupalGet('admin/structure/nivo-slider/options');
    $this->assertResponse(200, t('The privileged user can access the slider options administration page.'));

    $edit = array();
    $this->drupalPost('admin/structure/nivo-slider/options', $edit, t('Save configuration'));
    $this->assertText(t('The configuration options have been saved.'));
  }
}
