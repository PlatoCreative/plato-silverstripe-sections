<?php
/**
 * Adds sections to each page.
 *
 * @package plato-silverstripe-banners
 */
class SectionPageExtension extends DataExtension
{
    /**
	 * @var array
	 */
    private static $has_many = array(
 		'Sections' => 'Section'
 	);

    /**
     * @return FieldList
     */
    public function updateCMSFields(FieldList $fields)
    {
        $allow_page_types = $this->owner->config()->SectionIncludedPageTypes;
        $allow_page_types[] = 'SectionsPage';
        if (in_array($this->owner->ClassName, $allow_page_types)) {
            $SectionSubClasses = ClassInfo::subclassesfor('Section');
            unset($SectionSubClasses['Section']);
            foreach ($SectionSubClasses as $key => $value) {
                $SectionSubClasses[$key] = Section::NiceClass($value);
            }

            $SectionGridConfig = GridFieldConfig_RelationEditor::create()
    			->removeComponentsByType('GridFieldAddNewButton')
    			->addComponent(new GridFieldAddNewMultiClass())
                ->addComponent(new GridFieldOrderableRows('Sort'));

    		$SectionGridConfig->getComponentByType('GridFieldAddNewMultiClass')
    			->setClasses($SectionSubClasses);

            $fields->addFieldToTab(
                'Root.Sections',
                GridField::create(
                    'Sections',
                    'Current Section(s)',
                    $this->owner->Sections(),
                    $SectionGridConfig
                )
            );
        }

        return $fields;
    }
}
