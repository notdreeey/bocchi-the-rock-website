import { Link as RouterLink } from "react-router-dom";
import { Box, Button, Heading, Stack, Text } from "@chakra-ui/react";

export default function NotFoundPage() {
  return (
    <Box borderWidth="1px" borderColor="gray.700" rounded="xl" p={[6, 10]} bg="whiteAlpha.50">
      <Stack spacing={4} align="start">
        <Heading size="xl">404 - Page not found</Heading>
        <Text color="gray.300">
          The page you requested does not exist in this deployment.
        </Text>
        <Button as={RouterLink} to="/" colorScheme="pink">
          Back to Home
        </Button>
      </Stack>
    </Box>
  );
}
