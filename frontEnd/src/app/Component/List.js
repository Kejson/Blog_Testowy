import React from 'react'
import dane from '../Dane/postyDane.json'  


let arr = [...dane]
console.log(arr)

const List = () => {
    return(
        <li>
            {arr.map(e => {return e.title})}
        </li>
    )
}

export default List