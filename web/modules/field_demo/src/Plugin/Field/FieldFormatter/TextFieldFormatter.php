<?php

namespace Drupal\field_demo\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

// Test.
/**
 * Create a new formatter for demo_text_field text field.
 *
 * @FieldFormatter(
 *   id = "device_specific_formatter",
 *   label = @Translation("Device specific formatter"),
 *   field_types = {
 *     "demo_text_field"
 *   }
 * )
 */
class TextFieldFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'mob' => 356,
      'tab' => 800,
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $summary[] = $this->t('Show text with styles definition per field');

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $form['min'] = [
      '#title' => $this->t('Mobile'),
      '#type' => 'number',
      '#default_value' => $this->getSetting('mob'),
    ];
    $form['max'] = [
      '#title' => $this->t('tablet'),
      '#type' => 'number',
      '#default_value' => $this->getSetting('tab'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];
    $min = $this->getSetting('mob');
    $max = $this->getSetting('tab');

    foreach ($items as $delta => $item) {

      if (!empty($item->options['desktop'])) {
        $desktop = $item->options['desktop'];
      }

      if (!empty($item->options['tablet'])) {
        $tablet = $item->options['tablet'];
      }

      if (!empty($item->options['mobile'])) {
        $mobile = $item->options['mobile'];
      }

      $elements[$delta] = [
        '#type' => 'markup',
        '#markup' => '<div class = "viewport-field mob ">' . $mobile . '</div><div class = "viewport-field tab ">' . $tablet . '</div><div class = "viewport-field desk">' . $desktop . '</div>',
      ];

    }

    return $elements;
  }

}
