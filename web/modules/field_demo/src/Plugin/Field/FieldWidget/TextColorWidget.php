<?php

namespace Drupal\field_demo\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'text' widget.
 *
 * @FieldWidget(
 *   id = "text_trim",
 *   label = @Translation("Text Color widget"),
 *   field_types = {
 *     "string","text"
 *   }
 * )
 */
class TextColorWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'default_color' => '#F202F2',
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $elements = [];

    $elements['default_color'] = [
      '#type' => 'textfield',
      '#title' => t('Default color'),
      '#default_value' => $this->getSetting('default_color'),
    ];

    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];

    if (!empty($this->getSetting('default_color'))) {
      $summary[] = t('Default color: @placeholder', [
        '@placeholder' => $this->getSetting('default_color'),
      ]);
    }

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element['value']['icon_field'] = $element + [
      '#type' => 'textfield',
      '#title' => $this->t('Fontawesome content'),
      '#default_value' => !empty($item->value['icon_field'])
      ? $item->value['icon_field'] : FALSE,
    ];

    return $element;
  }

}
