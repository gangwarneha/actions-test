<?php

namespace Drupal\field_demo\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'demo_text_field' widget.
 *
 * @FieldWidget(
 *   id = "device_specific_widget",
 *   label = @Translation("Device Specific Widget"),
 *   field_types = {
 *     "demo_text_field"
 *   }
 * )
 */
class TextFieldWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $item = $items[$delta];

    $element['options']['desktop'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Desktop content'),
      '#default_value' => !empty($item->options['desktop']) ? $item->options['desktop'] : false,
    ];
    $element['options']['tablet'] = [
        '#type' => 'textfield',
      '#title' => $this->t('Tablet content'),
        '#default_value' => !empty($item->options['tablet']) ? $item->options['tablet'] : false,
     ];
    $element['options']['mobile'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Mobile content'),
      '#default_value' => !empty($item->options['mobile']) ? $item->options['mobile'] : false,
    ];

     return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function massageFormValues(array $values, array $form, FormStateInterface $form_state) {
      return array_map(
        function (array $value) {
          if (isset($value['options'])) {
            $value['options'] = array_filter(
            $value['options'],
            function ($attribute) {
                return $attribute !== "";
            }
            );
          }

          return $value;
        },
      $values
    );
  }

}
