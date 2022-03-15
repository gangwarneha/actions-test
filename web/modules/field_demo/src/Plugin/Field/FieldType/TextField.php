<?php

namespace Drupal\field_demo\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\TypedData\MapDataDefinition;
use Drupal\Core\Field\FieldStorageDefinitionInterface;

/**
 * Provides a field type of textfield.
 *
 * @FieldType(
 *   id = "demo_text_field",
 *   label = @Translation("Device specific field"),
 *   default_formatter = "device_specific_formatter",
 *   default_widget = "device_specific_widget",
 * )
 */
class TextField extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'options' => [
          'description' => 'Serialized array of options.',
          'type' => 'blob',
          'size' => 'big',
          'serialize' => TRUE,
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {

    $properties['options'] = MapDataDefinition::create()
      ->setLabel(t('Options'));

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('options')->getValue();

    return $value === NULL || $value === '';
  }

}
