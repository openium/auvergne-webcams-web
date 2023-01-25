# Auvergne Webcams

Web application and API

## Front 

display the content of the Webcams available in Auvergne - France

## API 

Send webcams to mobile applications

## Modele

```mermaid
---
title: Auvergne webcams
---
classDiagram
    
    class Section
    Section : +string id
    Section : +int sortOrder
    Section : +string title
    Section : +float latitude
    Section : +float longitude
    Section : +string color
    Section : +string imageName
        
    Section "1" --* "*" Webcam
    
    class Webcam
    Webcam : +string id
    Webcam : +string title
    Webcam : +int sortOrder
    Webcam : +string type
    Webcam : +?string link
    Webcam : +?string linkHD
    Webcam : +?string mapImageName
    Webcam : +float latitude
    Webcam : +float longitude
    Webcam : +bool hidden
    Webcam : +string[] tags
```

## Constants

### Webcam type
- image
- viewsurf

### Webcam mapImageName
- map-annotation-mountain
- map-annotation-lake
- map-annotation-road
- map-annotation-city
- map-annotation-highway

### Section imageName
- pdd-landscape
- waterfall-landscape
- goal-landscape
- mountain-landscape-1
- mountain-landscape-2
- lioran-landscape
- cf-landscape
- road-landscape
- car-landscape
- aurillac-landscape
- allier-landscape
- hl-landscape

