import React from 'react'

const List = ( {title,desc,author,img,src} ) => {
    
    return(
        <li key={title}>
            <section><img src={img} className='img-fluid img-thumbnail' alt='Obrazek trele morele'></img></section>
            <h1>{title}</h1>
            <p>{desc}</p>
            <p>autor: <span>{author}</span></p>
            <section><a href={src} className='btn btn-lg btn-primary'>Zobacz post!</a> <button className='btn btn-lg btn-danger'><i class="far fa-heart"></i></button></section>
        </li>
    )

}

export default List