import React, { useEffect, useState } from "react";
import api from "../api";
import { Typography, Box, List, ListItem, ListItemText } from "@mui/material";
import Image from 'mui-image'

export default function Index() {
    return (
        <div>
            <Typography variant="h4" align="center">𝔱𝔯𝔞𝔟𝔞𝔩𝔥𝔬 𝔡𝔬 𝔮𝔲𝔞𝔯𝔱𝔬 𝔟𝔦𝔪𝔢𝔰𝔱𝔯𝔢</Typography>
            <Box display="flex" justifyContent="center" alignItems="center">
                <Image src="img/zelda-malons-rose.gif" width={300} style={{ margin: "2rem" }} />
            </Box>
        </div>
    );
}
