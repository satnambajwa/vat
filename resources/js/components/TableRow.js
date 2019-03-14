import React, { Component } from 'react';

export default class TableRow extends React.Component {
    render() {
       return (
        <tr id={this.props.id}>
            <td className="pt-3-half client" >{this.props.data.item_id}</td>
            <td className="pt-3-half" >{this.props.data.description}</td>
            <td className="pt-3-half" >{this.props.data.quantity}</td>
            <td className="pt-3-half" >{this.props.data.unit_price}</td>
            <td className="pt-3-half" 
            suppressContentEditableWarning="true"
            onBlur={this.props.emitChange}
            contentEditable
            dangerouslySetInnerHTML={{__html: this.props.data.discount}}
            title={this.props.data.discount}
            id={this.props.id}
            >
            </td>
            <td className="pt-3-half" >{this.props.data.account_id}</td>
            <td className="pt-3-half" >{this.props.data.tax_rate}</td>
            <td className="pt-3-half" >{this.props.data.tax}</td>
            <td className="pt-3-half" >{this.props.data.amount}</td>
            <td className="pt-3-half">
                <button type="button" className="close"  aria-label="Close" onClick={()=>this.props.delRow(this.props.id)}>
                    <span aria-hidden="true">&times;</span>
                </button></td>
        </tr>
       );
    }
}