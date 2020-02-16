import React from 'react'

const List = ({title,desc,author}) => {
    
    return(
        <li>
            <h1>{title}</h1>
            <p>{desc}</p>
            <p>{author}</p>
        </li>
    )
}

export default List