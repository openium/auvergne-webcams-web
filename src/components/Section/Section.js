import React, {Component} from 'react';
import PropTypes from 'prop-types';
import './Section.css';
import {GridList, GridTile} from 'material-ui/GridList';

const styles = {
    root: {
        display: 'flex',
        flexWrap: 'wrap',
        justifyContent: 'space-around',
    },
};

class App extends Component {

    static propTypes = {
        section: PropTypes.object
    };

    render() {
        const sectionColor = this.props.section.mapColor;
        const backgroundColor = sectionColor + '99'; // 99 => 60% pour l'opacité
        const webcamList = this.props.section.webcams;

        return (
            <section className="webcam-section">
                <div className="webcam-section-header" style={{'background-color': this.props.section.mapColor}}>{this.props.section.title}</div>
                <div className="webcam-section-content">
                    <GridList
                        cellHeight={250}
                        cols={3}
                    >
                        {webcamList.map((webcam) => (
                            <GridTile
                                key={(webcam.imageHD != null) ? webcam.imageHD : webcam.imageLD}
                                title={webcam.title}
                                titleBackground={backgroundColor}
                            >
                                <img src={(webcam.imageHD != null) ? webcam.imageHD : webcam.imageLD} />
                            </GridTile>
                        ))}
                    </GridList>
                </div>
            </section>
        );
    }
}

export default App;
