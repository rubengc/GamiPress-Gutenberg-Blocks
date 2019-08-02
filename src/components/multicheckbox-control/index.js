/**
 * Control to create a multi-checkbox field similar to RadioControl
 *
 * @version 1.0.0
 * @author Ruben Garcia <rubengcdev@gmail.com>
 */

/**
 * External dependencies
 */
import { isEmpty } from 'lodash';
import classnames from 'classnames';

/**
 * WordPress dependencies
 */
const { BaseControl } = wp.components;

/**
 * Internal dependencies
 */
import './style.scss';

const MultiCheckboxControl = ( { label, className, selected, help, instanceId, onChange, options = [] } ) => {
    const id = `inspector-multicheckbox-control-${ instanceId }`;
    const onChangeValue = ( event ) => {
        // Get all field inputs
        let inputNodes = event.target.parentElement.parentElement.getElementsByTagName('INPUT');
        let selectedOptions = [];

        // Loop inputs to return only checked ones
        for(var i = 0; i < inputNodes.length; ++i){
            var inputNode = inputNodes[i];

            // If input is checked append it to the array of selected values
            if(inputNode.checked)
                selectedOptions.push( inputNode.value );
        }

        onChange( selectedOptions );
    };

    return ! isEmpty( options ) && (
        <BaseControl label={ label } id={ id } help={ help } className={ classnames( className, 'components-multicheckbox-control' ) }>
            { options.map( ( option, index ) =>
                <div
                    key={ `${ id }-${ index }` }
                    className="components-multicheckbox-control__option"
                >
                    <input
                        id={ `${ id }-${ index }` }
                        className="components-multicheckbox-control__input"
                        type="checkbox"
                        name={ id }
                        value={ option.value }
                        onChange={ onChangeValue }
                        checked={ Array.isArray( selected ) ? selected.indexOf( option.value ) !== -1 : option.value === selected }
                        aria-describedby={ !! help ? `${ id }__help` : undefined }
                    />
                    <label htmlFor={ `${ id }-${ index }` }>
                        { option.label }
                    </label>
                </div>
            ) }
        </BaseControl>
    );
}

export default MultiCheckboxControl;