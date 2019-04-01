import React from 'react';
import Downshift from 'downshift'

export default class TableRow extends React.Component {
    
    render() {
        return (
        <tr id={this.props.id}>
            <td className="pt-3-half client" >
                
                <Downshift 
                    onChange={(selection) => this.props.emitChangeItem(selection)} 
                    itemToString={item => (item ? item.name : '')}
                    
                >
                    {
                        ({getInputProps,getItemProps,getMenuProps,isOpen,inputValue,highlightedIndex,selectedItem}) =>
                        (
                        <div>
                            <div>
                                <input {...getInputProps()} className="in-drop-box"  />
                            </div>
                            <ul className="autoComplete in-drop" {...getMenuProps()}>
                                {isOpen? this.props.items.filter(item => !inputValue || item.name.includes(inputValue)).map((item, index) => (
                                    <li {...getItemProps({key: item.name,index,item,style: {backgroundColor:highlightedIndex === index ? 'lightgray' : 'white',fontWeight: selectedItem === item ? 'bold' : 'normal',},})}>
                                        {item.name}
                                    </li>
                                    
                                    )): null
                                }
                            </ul>
                        </div>
                        )
                    }
                </Downshift>
            </td>
            <td className="pt-3-half"
                suppressContentEditableWarning="true"
                onBlur={this.props.emitChange}
                onChange={this.props.emitChange}
                contentEditable
                dangerouslySetInnerHTML={{__html: this.props.data.description}}
                lang="description"
                value={this.props.data.description}
                id={this.props.id}
            >
            </td>
            <td className="pt-3-half"
                suppressContentEditableWarning="true"
                onBlur={this.props.emitChange}
                onChange={this.props.emitChange}
                contentEditable
                dangerouslySetInnerHTML={{__html: this.props.data.quantity}}
                lang="quantity"
                value={this.props.data.quantity}
                id={this.props.id}
            >
            </td>
            <td className="pt-3-half" 
                suppressContentEditableWarning="true"
                onBlur={this.props.emitChange}
                onChange={this.props.emitChange}
                contentEditable
                dangerouslySetInnerHTML={{__html: this.props.data.unit_price}}
                lang="unit_price"
                value={this.props.data.unit_price}
                id={this.props.id}
            >
            </td>
            <td className="pt-3-half" 
                suppressContentEditableWarning="true"
                onBlur={this.props.emitChange}
                onChange={this.props.emitChange}
                contentEditable
                dangerouslySetInnerHTML={{__html: this.props.data.discount}}
                lang="discount"
                value={this.props.data.discount}
                id={this.props.id}
            >
            </td>
            <td className="pt-3-half" >
                <select  value={this.props.data.account_id} onChange={(e) => this.props.accountChange(e.target.value)}>
                    {this.props.accounts.map(
                        (account) =><option key = {"tax-"+account.id} value={account.id}>{account.name}</option>
                    )}
                </select>
            </td>
            <td className="pt-3-half" >{this.props.data.tax_rate}</td>
            <td className="pt-3-half" >
                <select  value={this.props.data.tax_id} onChange={(e) => this.props.taxChange(e.target.value)}>
                    {this.props.taxes.map(
                        (tax) =><option key = {"tax-"+tax.id} value={tax.id}>{tax.name}</option>
                    )}
                </select>
            </td>
            <td className="pt-3-half" >{this.props.data.amount}</td>
            <td className="pt-3-half">
                <button type="button" className="close"  aria-label="Close" onClick={()=>this.props.delRow(this.props.id)}>
                    <span aria-hidden="true">&times;</span>
                </button></td>
        </tr>
       );
    }
}